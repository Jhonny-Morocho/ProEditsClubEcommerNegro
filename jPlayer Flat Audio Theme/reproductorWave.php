

<script src="https://unpkg.com/wavesurfer.js"></script>

<div class="container">
    <div class="demo">
        <div id="waveform"></div>
        <div class="volbox">
        Volume:<br/>
        <input id="volume" type="range" min="0" max="1" value="1" step="0.1">
        </div>
        
        <div class="" style="">
          <!-- <button onclick="wavesurfer.playPause()">
            <i class="glyphicon glyphicon-play"></i>
            Play/Pause
          </button> -->
          
           <div id="equalizer" style="margin-top: 10px"></div>
          
        </div>
        
    </div>
</div>




<style>
    /* body{
  font: 15px helvetica,arial,freesans,clean,sans-serif;
  margin: 20px auto;    
  text-align: center;
} */
#waveform{
  background: rgba(0,0,0,0.8);
  /* margin-bottom: 10px; */
}
/* button{
  background: #eee;
  border: 1px solid #ddd;
  border-bottom: 4px solid #ccc;
  cursor: pointer;
  font-size: 20px;
  margin-top: 10px;
  padding: 10px;
}
button:active{
  outline: none;
  border-top: 4px solid #eee;
  border-bottom: 2px solid #777;
}
button:focus{
  outline: none;
} */
.volbox{
  margin-bottom: 40px;
  display: none;
}

#equalizer{
    display: none;
}
</style>

<script>
var wavesurfer = WaveSurfer.create({
  container: '#waveform',
  waveColor: '#D2EDD4',
  barHeight:3,
  barWidth:1,
  height:65,
  fillParent:true,
  cursorWidth:6,

//   autoCenter:true,
  progressColor: '#fd0002'
})




// Equalizer
wavesurfer.on('ready', function () {
  var EQ = [
    {
      f: 32,
      type: 'lowshelf'
    }, {
      f: 64,
      type: 'peaking'
    }, {
      f: 125,
      type: 'peaking'
    }, {
      f: 250,
      type: 'peaking'
    }, {
      f: 500,
      type: 'peaking'
    }, {
      f: 1000,
      type: 'peaking'
    }, {
      f: 2000,
      type: 'peaking'
    }, {
      f: 4000,
      type: 'peaking'
    }, {
      f: 8000,
      type: 'peaking'
    }, {
      f: 16000,
      type: 'highshelf'
    }
  ];

  // Create filters
  var filters = EQ.map(function (band) {
    var filter = wavesurfer.backend.ac.createBiquadFilter();
    filter.type = band.type;
    filter.gain.value = 0;
    filter.Q.value = 1;
    filter.frequency.value = band.f;
    return filter;
  });

  // Connect filters to wavesurfer
  wavesurfer.backend.setFilters(filters);

  wavesurfer.setVolume(0.4);
  document.querySelector('#volume').value = wavesurfer.backend.getVolume();
  
  // Bind filters to vertical range sliders
  var container = document.querySelector('#equalizer');
  filters.forEach(function (filter) {
    var input = document.createElement('input');
    wavesurfer.util.extend(input, {
      type: 'range',
      min: -40,
      max: 40,
      value: 0,
      title: filter.frequency.value
    });
    input.style.display = 'inline-block';
    input.setAttribute('orient', 'vertical');
    wavesurfer.drawer.style(input, {
      'webkitAppearance': 'slider-vertical',
      width: '50px',
      height: '150px'
    });
    container.appendChild(input);

    var onChange = function (e) {
      filter.gain.value = ~~e.target.value;
    };

    input.addEventListener('input', onChange);
    input.addEventListener('change', onChange);
  });

  
    var volumeInput = document.querySelector('#volume');
    var onChangeVolume = function (e) {
      wavesurfer.setVolume(e.target.value);
      console.log(e.target.value);
    };
  volumeInput.addEventListener('input', onChangeVolume);
  volumeInput.addEventListener('change', onChangeVolume);

  
  // For debugging
  wavesurfer.filters = filters;
});

</script>