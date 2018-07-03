<input type="hidden" name="table" value="<?php echo substr($currPage, strpos($currPage, '-') + 1); ?>">
<input type="hidden" name="id" value="<?php if ($item) echo $item->id; ?>">
<?php if (!$item) echo '<span id="goto" class="hidden" data-url="'.$currBase.'/'.substr($currPage, strpos($currPage, '-') + 1).'.php"></span>'; ?>