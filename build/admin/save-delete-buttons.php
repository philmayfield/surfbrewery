<div class="btn-group" role="group" aria-label="Form Controls">
	<button type="submit" class="btn btn-primary">Save Changes</button>
	<button id="delete-item" type="button" class="btn btn-danger confirm" data-table="<?php echo substr($currPage, strpos($currPage, '-') + 1); ?>" data-id="<?php echo $item->id; ?>" data-goto="<?php echo $currBase.'/'.substr($currPage, strpos($currPage, '-') + 1).'.php'; ?>">Delete</button>
</div>