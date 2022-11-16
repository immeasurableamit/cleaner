@extends('layouts.adminapp')
@section('content')
<section class="table-layout-sec jobs">
	<div class="white-bg-wrapper">
		<div class="tab-content">
			<div class="tab-pane active" id="all">
				<div class="table-design">

					@livewire('admin.services.services')

				</div>
			</div>
		</div>
	</div>
</section>
@endsection