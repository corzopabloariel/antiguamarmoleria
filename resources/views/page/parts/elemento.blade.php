@php
$flag = false;
$class = "producto--color producto--hover shadow-sm w-100";
$class_text = "producto--title producto--title__color";
$arr = ['i' => $e->firstImage()["image"], 'c' => 'producto--image' , 'n' => ""];
if (empty($e->in_background))
    $arr["in_div"] = 0;
$image = View('layouts.general.image', $arr)->render();
if(empty($e->images)) {
    $class .= " d-flex";
    $class_text .= " align-self-center";
}
if (!$e->is_link)
    $class_text .= " producto--color__sin";
$characteristics = "";
$images = "";
if(!empty($e->images)) {
    $t = count($e->images);
    $images = "<span>{$t} <i class='far fa-image'></i></span>";
}
$title = "<p class='{$class_text} d-flex justify-content-between'>{$e->title}{$images}</p>";
/*if(!empty($e->characteristics)) {
    $characteristics .= "<div class='p-3 border-top'>";
    foreach($e->characteristics AS $characteristic)
        $characteristics .= "<p class='producto--characteristic' style='--bg: {$data["marca"]->color["color"]}; --txt: {$data["marca"]->color_text["color_text"]};'><strong>{$characteristic["icon"]}{$characteristic["title"]}</strong>{$characteristic["data"]}</p>";
    $characteristics .= "</div>";
}*/
$html = "";
if ($e->show == 1) {
    if(!empty($e->images))
        $html .= $image;
    $html .= $title;
    if (!empty($characteristics) && empty($e->images) && $e->productos()->count() == 0) {
        if (strpos($class, "d-flex") !== false)
            $class .= str_replace(" d-flex", "", $class);
        $html .= $characteristics;
    }
}
if ($e->show == 2) {
    if (strpos($class_text, "align-self-center") === false)
        $class_text .= " align-self-center";
    if (strpos($class, "d-flex") === false)
        $class .= " d-flex";
    $title = "<p class='{$class_text}'>{$e->title}</p>";
    $html .= $title;
}
if ($e->show == 3)
    $html .= $image;
if ($e->is_link)
    $flag = true;
@endphp
<div class="hover d-flex align-items-stretch">
    @php
    $images = "";
    if (!isset($data["no__zoom"]))
        $images = empty($e->images) ? "" : json_encode($e->images);
    @endphp
    <button onclick="zoom(this);" data-images="{{$images}}" data-title="{{$e->title}}" class="hover--button" type="button"><i class="fas fa-search"></i></button>
    <a @if($flag) href="{{ URL::to($e->link()) }}" @endif class="{{ $class }}">
        {!! $html !!}
    </a>
</div>
@push("scripts")
<script>
    zoom = t => {
        const modal = document.querySelector("#imagesModal");
        const target = document.querySelector("#carouselImages");
        const images = JSON.parse(t.dataset.images);
        const prev = document.querySelector(".carousel-control-prev");
        const next = document.querySelector(".carousel-control-next");
        const title = t.dataset.title;
        document.querySelector("#imagesModal--title").textContent = title;
        target.innerHTML = "";
        if (images.length === 1) {
            prev.classList.add("d-none");
            next.classList.add("d-none");
        } else {
            prev.classList.remove("d-none");
            next.classList.remove("d-none");
        }
        images.forEach((x, index) => {
            let div = document.createElement("div");
            let img = document.createElement("img");
            img.classList.add("d-block", "w-100");
            img.alt = index;
            img.src = `${url_base}/${x.image.i}`;
            div.classList.add("carousel-item");
            if (index === 0)
                div.classList.add("active");
            div.appendChild(img);
            target.appendChild(div);
        });
        $('.carousel').carousel();
        $(modal).modal("show");
    }
</script>
@endpush