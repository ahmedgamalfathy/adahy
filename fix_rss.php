<?php
$path = 'resources/views/adahyt_rss.blade.php';
$c = file_get_contents($path);

// Tab headers
$c = str_replace(
    "style=\"{{ \$day == 3 ?\" background-color: white\":null}}\"\n\t\t\t\t\t\t\t\t\t <?if(\$day == 3){?> class=\"tab-header2\" <?}else{?>class=\"tab-header\"<?}?>>",
    "style=\"{{ \$day == 3 ? 'background-color: white' : null }}\"\n\t\t\t\t\t\t\t\t\t @if(\$day == 3) class=\"tab-header2\" @else class=\"tab-header\" @endif>",
    $c
);
$c = str_replace(
    "style=\"{{ \$day == 2 ?\" background-color: white\":null}}\"\n\t\t\t\t\t\t\t\t\t\t<?if(\$day == 2){?> class=\"tab-header2\" <?}else{?>class=\"tab-header\"<?}?>>",
    "style=\"{{ \$day == 2 ? 'background-color: white' : null }}\"\n\t\t\t\t\t\t\t\t\t\t@if(\$day == 2) class=\"tab-header2\" @else class=\"tab-header\" @endif>",
    $c
);
$c = str_replace(
    "style=\"{{ \$day == 1 ?\" background-color: white\":null}}\"\n\t\t\t\t\t\t\t\t\t <?if(\$day == 1 || \$day == 0){?> class=\"tab-header2\" <?}else{?>class=\"tab-header\"<?}?>>",
    "style=\"{{ \$day == 1 ? 'background-color: white' : null }}\"\n\t\t\t\t\t\t\t\t\t @if(\$day == 1 || \$day == 0) class=\"tab-header2\" @else class=\"tab-header\" @endif>",
    $c
);

// Cards divs
$c = str_replace(
    '<div <?if($gs->free == 0 || $is_available != $gs->is_available){?>class="cards"<?}else{?>class="cards2"<?}?>>',
    '<div @if($gs->free == 0 || $is_available != $gs->is_available) class="cards" @else class="cards2" @endif>',
    $c
);
$c = str_replace(
    '<div <?if($gs->free == 0){?>class="circle-one"<?}else{?>class="circle-half"<?}?>>',
    '<div @if($gs->free == 0) class="circle-one" @else class="circle-half" @endif>',
    $c
);
$c = str_replace(
    '<?if($gs->free == 0 || $is_available != $gs->is_available ){?>',
    '@if($gs->free == 0 || $is_available != $gs->is_available)',
    $c
);
$c = str_replace('<?}else{?>', '@else', $c);
$c = str_replace('<div  <?if($gs->free == 0){?>class="base"<?}else{?>class="base1"<?}?>>', '<div @if($gs->free == 0) class="base" @else class="base1" @endif>', $c);
$c = str_replace('<div  <?if($gs->free == 0){?>class="ellipse"<?}else{?>class="ellipse2"<?}?>>', '<div @if($gs->free == 0) class="ellipse" @else class="ellipse2" @endif>', $c);
$c = str_replace('<?if($gs->free == 0){?>', '@if($gs->free == 0)', $c);
$c = str_replace('<b class="b" @if($gs->free == 0)style="padding-left: 8%;"@endif>', '<b class="b" @if($gs->free == 0) style="padding-left: 8%;" @endif>', $c);
$c = str_replace(
    '<div class="parent" <?if($gs->free == 0){?>style="padding-left: 37%;direction: ltr;"<?}else{?>style="direction: ltr;"<?}?>>',
    '<div class="parent" style="direction: ltr;">',
    $c
);

// img src
$c = preg_replace(
    '/<img class="animal-img-icon" alt="" \s*[\s\S]*?>/U',
    '<img class="animal-img-icon" alt="" src="/img/{{ $gs->adahy == \'بقرى\' ? \'1\' : ($gs->adahy == \'جمسى\' ? \'2\' : ($gs->adahy == \'خراف\' ? \'3\' : \'4\')) }}.png">',
    $c
);

// Remaining <?}?> -> @endif
$c = str_replace('<?}?>', '@endif', $c);

// get_adahy foreach
$c = str_replace(
    "<?
 
          					       \$get_adahy = DB::table('adahyt')->where(function(\$query) use (\$type,\$sak,\$day,\$c_sak,\$filter,\$gov,\$is_available) {",
    "@php \$get_adahy = DB::table('adahyt')->where(function(\$query) use (\$type,\$sak,\$day,\$c_sak,\$filter,\$gov,\$is_available) {",
    $c
);
$c = str_replace(
    "})->where('times', '=', \$get->id)->orderBy('id','ASC')->get();\n                                      foreach (\$get_adahy as \$gs){\n          					    ?>",
    "})->where('times', '=', \$get->id)->orderBy('id','ASC')->get();\n                                    @endphp\n                                    @foreach(\$get_adahy as \$gs)",
    $c
);

// foreach closings
$c = str_replace(
    "@endif\n            						\n            				\n            						\n          					</div>\n          				@endif",
    "@endif\n            						\n            				\n            						\n          					</div>\n          				@endforeach",
    $c
);

// Fix the two foreach end markers
$c = str_replace(
    "            						@endif\n            				\n            						\n          					</div>\n          				@endif\n        				</div>",
    "            						@endif\n            				\n            						\n          					</div>\n          				@endforeach\n        				</div>",
    $c
);

// Session theme block
$c = str_replace(
    "           	<?\n\tif(Session::has('thems')){\n\t if(Session::get('thems') == 'dark'){\n\t     ?>",
    "           	@php\n\tif(Session::has('thems')){\n\t if(Session::get('thems') == 'dark'){\n\t     @endphp",
    $c
);
$c = str_replace(
    "     <?\n     \n\t }   \n\t}\n\t    ?>",
    "     @php\n     \n\t }   \n\t}\n\t    @endphp",
    $c
);

// Any remaining <? ?> -> @php @endphp
$c = preg_replace('/<\?(?!php|xml|=)/', '@php ', $c);
$c = str_replace('?>', ' @endphp', $c);

file_put_contents($path, $c);
echo "Done!\n";
