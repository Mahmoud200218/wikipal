@extends('layouts.app')
@section('content')
<div class="container">
    <div class="video-list">
        <ul>
            <li><a href="#" onclick="loadVideo('UCNye-wNBqNL5ZzHSJj3l8Bg', 0, event)">{{ __('Al Jazeera English') }}</a></li>
            <li><a href="#" onclick="loadVideo('UC16niRr50-MSBwiO3YDb3RA', 1, event)">{{ __('Al Jazeera Arabic') }}</a></li>
            <li><a href="#" onclick="loadVideo('UCYfdidRxbB8Qhf0Nx7ioOYw', 2, event)">{{ __('Alaraby TV News') }}</a></li>
            <li><a href="#" onclick="loadVideo('UCpwvZwUam-URkxB7g4USKpg', 3, event)">{{ __('AlHadath') }}</a></li>
            <li><a href="#" onclick="loadVideo('UC8p1vwvWtl6T73JiExfWs1g', 4, event)">{{ __('TRT World') }}</a></li>
            <li><a href="#" onclick="loadVideo('UCaXkIU1QidjPwiAYu6GcHjg', 5, event)">{{ __('Makkah Live') }}</a></li>
            <li><a href="#" onclick="loadVideo('UCbu2SsF-Or3Rsn3NxqODImw', 6, event)">{{ __('Sky News Arabia') }}</a></li>
        </ul>
    </div>
    <div class="video-frame" id="frame-0" style="display:none;">
        <iframe id="live-video-0" src="https://www.youtube.com/embed/live_stream?channel=UCNye-wNBqNL5ZzHSJj3l8Bg" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="video-frame" id="frame-1" style="display:none;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/bNyUyrR0PHo?si=IBBJFzMFQe4cxbit" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="video-frame" id="frame-2" style="display:none;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/e2RgSa1Wt5o?si=K_TxjQQDuKVmaE92" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="video-frame" id="frame-3" style="display:none;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/et0bSUddkn4?si=s1TLRRPg2qaX6trN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="video-frame" id="frame-4" style="display:none;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/OVCIXM_YIEc?si=OZXwfQiMKwMw6NBb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="video-frame" id="frame-5" style="display:none;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Bpm7XNGYANE?si=kzNqmYp611v-K9hl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="video-frame" id="frame-6" style="display:none;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/xLo3WBYlby4?si=uQGqw4_75w7-1vsD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>

<script>
    function loadVideo(channelId, frameIndex, event) {
        event.preventDefault();

        const allFrames = document.querySelectorAll('.video-frame');
        allFrames.forEach(frame => frame.style.display = 'none');

        const selectedFrame = document.getElementById('frame-' + frameIndex);
        selectedFrame.style.display = 'block';

        const iframe = document.getElementById('live-video-' + frameIndex);
        iframe.src = `https://www.youtube.com/embed/live_stream?channel=${channelId}`;
    }
</script>

@endsection