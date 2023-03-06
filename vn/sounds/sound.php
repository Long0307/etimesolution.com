<!DOCTYPE html>
<html>
<body>

<audio controls autoplay id="audio_playo24">
  <!-- <source src="horse.ogg" type="audio/ogg"> -->
  <source src="clock.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<a href="javascript:void(0);" onclick="toggleMute()">Mute/Unmute</a>

<script>
  
  function toggleMute() {
   var myAudio = document.getElementById('audio_playo24');
   myAudio.muted = !myAudio.muted;
}
  
</script>
</body>
</html>

