@php
$flag = false;
$class = "producto--color producto--hover shadow-sm w-100";
$class_text = "producto--title producto--title__color";
$image = View( 'layouts.general.image' , [ 'i' => $p->firstImage()["image"] , 'c' => 'producto--image' , 'n' => "", "in_div" => 1] )->render();
if($e->productos()->count() == 0 && empty($e->images))
    $class .= " producto--color__sin";
if(empty($e->images)) {
    $class .= " d-flex";
    $class_text .= " align-self-center";
}
$characteristics = "";
$title = "<p class='{$class_text}'>{$e->title}</p>";

if(!empty($e->characteristics)) {
    $characteristics .= "<div class='p-3 border-top'>";
    foreach($e->characteristics AS $characteristic)
        $characteristics .= "<p class='producto--characteristic' style='--bg: {$data["marca"]->color["color"]}; --txt: {$data["marca"]->color_text["color_text"]};'><strong>{$characteristic["icon"]}{$characteristic["title"]}</strong>{$characteristic["data"]}</p>";
    $characteristics .= "</div>";
}
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

if (isset($data['colores']) && $data['colores']) {
    $flag = true;
    if ($e->productos()->count() == 0)
        $flag = false;
} else {
    if ((empty($e->characteristic) || empty($e->images)) && $e->productos()->count() == 0)
        $flag = false;
}
@endphp
<a @if($flag) href="{{ URL::to($e->link()) }}" @endif class="{{ $class }}">
    {!! $html !!}
</a>