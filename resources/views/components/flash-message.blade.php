@if(session()->has('success'))
<div class="alert alert-success d-flex align-items-center p-4" role="alert" style="border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);margin:0 30px;">
    <div style="margin-right: 15px;">
        <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #28a745;" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.97-8.97a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-2.5-2.5a.75.75 0 0 1 1.06-1.06L8 10.44l3.97-3.97z" />
        </svg>
    </div>
    <div>
        <strong>Success!</strong> {{ session('success') }}
    </div>
</div>
@endif

@if(session()->has('info'))
<div class="alert alert-info d-flex align-items-center p-4" role="alert" style="border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);margin:0 30px;">
    <div style="margin-right: 15px;">
        <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #28a745;" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.97-8.97a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-2.5-2.5a.75.75 0 0 1 1.06-1.06L8 10.44l3.97-3.97z" />
        </svg>
    </div>
    <div>
        <strong>Success!</strong> {{ session('info') }}
    </div>
</div>
@endif

@if(session()->has('danger'))
<div class="alert alert-danger d-flex align-items-center p-4" role="alert" style="border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);margin:0 30px;">
    <div style="margin-right: 15px;">
        <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #28a745;" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.97-8.97a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-2.5-2.5a.75.75 0 0 1 1.06-1.06L8 10.44l3.97-3.97z" />
        </svg>
    </div>
    <div>
        <strong>Success!</strong> {{ session('danger') }}
    </div>
</div>
@endif


@if(session()->has('error'))
<div class="alert alert-danger d-flex align-items-center p-4" role="alert" style="border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);margin:30px 0px;">
    <div>
        <strong>Sorry!</strong> {{ session('error') }}
    </div>
</div>
@endif