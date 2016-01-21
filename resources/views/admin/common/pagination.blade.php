<div class="row">
{{-- 	<div class="col-sm-6">
		<div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries
		</div>
	</div> --}}
	<div class="col-sm-6">
		<div class="dataTables_paginate paging_simple_numbers">	
			{!! ( isset($pagination) ? $pagination : '' ) !!}
		</div>
	</div>
</div>