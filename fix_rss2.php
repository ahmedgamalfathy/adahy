<?php
$path = 'resources/views/adahyt_rss.blade.php';
$lines = file($path);
$out = [];

$i = 0;
while ($i < count($lines)) {
    $line = $lines[$i];
    $trimmed = trim($line);

    // Fix: <? \n $get_adahy = ... foreach($get_adahy as $gs){ ?>
    if (trim($line) === '<?' && isset($lines[$i+1]) && strpos($lines[$i+1], '$get_adahy') !== false) {
        // Collect until ?>
        $block = '';
        $i++; // skip <?
        while ($i < count($lines) && strpos($lines[$i], '?>') === false) {
            $block .= $lines[$i];
            $i++;
        }
        // $lines[$i] has the closing ?>
        $block .= $lines[$i]; // include the foreach line with ?>
        
        // Remove the foreach line and ?>
        $block = preg_replace('/\s*foreach\s*\(\$get_adahy\s+as\s+\$gs\)\s*\{\s*\n/', '', $block);
        $block = rtrim($block, " \t\n\r?>");
        
        $out[] = "          					    @php\n";
        $out[] = $block . "\n";
        $out[] = "                                    @endphp\n";
        $out[] = "                                    @foreach(\$get_adahy as \$gs)\n";
        $i++;
        continue;
    }

    // Fix tab-header divs with short tags
    if (strpos($line, '<?if($day == 3){?>') !== false) {
        $line = preg_replace('/\{\{ \$day == 3 \?" background-color: white":null\}\}/', "{{ \$day == 3 ? 'background-color: white' : null }}", $line);
        $line = str_replace('<?if($day == 3){?> class="tab-header2" <?}else{?>class="tab-header"<?}?>', '@if($day == 3) class="tab-header2" @else class="tab-header" @endif', $line);
    }
    if (strpos($line, '<?if($day == 2){?>') !== false) {
        $line = preg_replace('/\{\{ \$day == 2 \?" background-color: white":null\}\}/', "{{ \$day == 2 ? 'background-color: white' : null }}", $line);
        $line = str_replace('<?if($day == 2){?> class="tab-header2" <?}else{?>class="tab-header"<?}?>', '@if($day == 2) class="tab-header2" @else class="tab-header" @endif', $line);
    }
    if (strpos($line, '<?if($day == 1 || $day == 0){?>') !== false) {
        $line = preg_replace('/\{\{ \$day == 1 \?" background-color: white":null\}\}/', "{{ \$day == 1 ? 'background-color: white' : null }}", $line);
        $line = str_replace('<?if($day == 1 || $day == 0){?> class="tab-header2" <?}else{?>class="tab-header"<?}?>', '@if($day == 1 || $day == 0) class="tab-header2" @else class="tab-header" @endif', $line);
    }

    // Fix cards/circle divs
    $line = str_replace('<div <?if($gs->free == 0 || $is_available != $gs->is_available){?>class="cards"<?}else{?>class="cards2"<?}?>>', '<div @if($gs->free == 0 || $is_available != $gs->is_available) class="cards" @else class="cards2" @endif>', $line);
    $line = str_replace('<div <?if($gs->free == 0){?>class="circle-one"<?}else{?>class="circle-half"<?}?>>', '<div @if($gs->free == 0) class="circle-one" @else class="circle-half" @endif>', $line);
    $line = str_replace('<?if($gs->free == 0 || $is_available != $gs->is_available ){?>', '@if($gs->free == 0 || $is_available != $gs->is_available)', $line);
    $line = str_replace('<div  <?if($gs->free == 0){?>class="base"<?}else{?>class="base1"<?}?>>', '<div @if($gs->free == 0) class="base" @else class="base1" @endif>', $line);
    $line = str_replace('<div  <?if($gs->free == 0){?>class="ellipse"<?}else{?>class="ellipse2"<?}?>>', '<div @if($gs->free == 0) class="ellipse" @else class="ellipse2" @endif>', $line);
    $line = str_replace('<?if($gs->free == 0){?>', '@if($gs->free == 0)', $line);
    $line = str_replace('<b class="b" <?if($gs->free == 0){?>style="padding-left: 8%;"<?}?>>', '<b class="b" @if($gs->free == 0) style="padding-left: 8%;" @endif>', $line);
    $line = str_replace('<div class="parent" <?if($gs->free == 0){?>style="padding-left: 37%;direction: ltr;"<?}else{?>style="direction: ltr;"<?}?>>', '<div class="parent" style="direction: ltr;">', $line);
    $line = str_replace('<?}else{?>', '@else', $line);
    $line = str_replace('<?}?>', '@endif', $line);

    // Fix img src block (multi-line) - detect start
    if (trim($line) === '<img class="animal-img-icon" alt="" ') {
        // Skip until >
        while ($i < count($lines) && trim($lines[$i]) !== '>') $i++;
        $out[] = '              							<img class="animal-img-icon" alt="" src="/img/{{ $gs->adahy == \'بقرى\' ? \'1\' : ($gs->adahy == \'جمسى\' ? \'2\' : ($gs->adahy == \'خراف\' ? \'3\' : \'4\')) }}.png">' . "\n";
        $i++;
        continue;
    }

    // Fix foreach closings <?}?> -> @endforeach
    if (trim($line) === '<?}?>' && isset($lines[$i+1]) && (strpos($lines[$i+1], '</div>') !== false || trim($lines[$i+1]) === '')) {
        // Check if this is a foreach closing (look at context)
        $out[] = str_replace('<?}?>', '@endforeach', $line);
        $i++;
        continue;
    }

    // Fix session theme block
    if (trim($line) === '<?' && isset($lines[$i+1]) && strpos($lines[$i+1], "Session::has") !== false) {
        $out[] = str_replace('<?', '@php', $line);
        $i++;
        continue;
    }
    if (strpos($line, "if(Session::get('thems') == 'dark'){") !== false && strpos($line, '?>') !== false) {
        $line = str_replace('?>', '@endphp', $line);
    }
    if (trim($line) === '<?' && isset($lines[$i+1]) && strpos($lines[$i+1], '}') !== false && isset($lines[$i+2]) && strpos($lines[$i+2], '}') !== false) {
        $out[] = str_replace('<?', '@php', $line);
        $i++;
        continue;
    }

    // Generic: remaining <? -> @php and ?> -> @endphp (not in script)
    if (strpos($line, '<?') !== false && strpos($line, '<?php') === false && strpos($line, '<?xml') === false) {
        $line = preg_replace('/<\?(?!php|xml|=)/', '@php ', $line);
        $line = str_replace('?>', ' @endphp', $line);
    }

    $out[] = $line;
    $i++;
}

file_put_contents($path, implode('', $out));
echo "Done!\n";
