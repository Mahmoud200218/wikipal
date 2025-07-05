@php
    $alerts = [
        'success' => ['title' => 'SUCCESS', 'color' => '#16a34a', 'bg' => '#f0fdf4', 'border' => '#bbf7d0', 'icon' => 'M5 13l4 4L19 7'],
        'info' => ['title' => 'UPDATE', 'color' => '#2563eb', 'bg' => '#eff6ff', 'border' => '#bfdbfe', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z'],
        'danger' => ['title' => 'SUCCESS DELETE!', 'color' => '#dc2626', 'bg' => '#fef2f2', 'border' => '#fecaca', 'icon' => 'M6 18L18 6M6 6l12 12'],
        'error' => ['title' => 'SORRY!', 'color' => '#b91c1c', 'bg' => '#fef2f2', 'border' => '#fecaca', 'icon' => 'M6 18L18 6M6 6l12 12'],
    ];
@endphp

@foreach ($alerts as $type => $data)
    @if(session()->has($type))
        <div class="custom-alert" style="
            background: {{ $data['bg'] }};
            color: {{ $data['color'] }};
            border: 1px solid {{ $data['border'] }};
        " id="alert_{{ $type }}">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="{{ $data['icon'] }}" />
                </svg>
            </div>
            <div class="message">
                <span class="title">{{ $data['title'] }}</span>
                <p>{{ session($type) }}</p>
            </div>
            <button class="close-btn" onclick="document.getElementById('alert_{{ $type }}').style.display='none'">
                &times;
            </button>
        </div>
    @endif
@endforeach

<style>
    .custom-alert {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 16px 20px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        margin: 20px 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        position: relative;
        animation: fadeIn 0.5s ease-in-out;
    }

    .custom-alert .icon svg {
        width: 28px;
        height: 28px;
    }

    .custom-alert .message .title {
        display: block;
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 3px;
    }

    .custom-alert .message p {
        margin: 0;
        font-size: 15px;
    }

    .custom-alert .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: inherit;
        transition: opacity 0.2s ease-in-out;
    }

    .custom-alert .close-btn:hover {
        opacity: 0.6;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
