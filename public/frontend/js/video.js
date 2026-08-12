
const v=myVideo,b=playBtn,d=videoDuration;

b.onclick=()=>v.paused?(v.play(),v.controls=1,b.classList.add('d-none'),d.classList.add('d-none')):v.pause();

v.onpause=()=>{v.controls=0;b.classList.remove('d-none');d.classList.remove('d-none');};


