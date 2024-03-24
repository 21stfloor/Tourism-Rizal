const panoImage = document.querySelector('.pano-image');
const tanayPano = '../images/360view.jpg';

const panorama  = new PANOLENS.ImagePanorama(tanayPano);
const viewer    = new PANOLENS.Viewer({
    container: panoImage
});

viewer.add(panorama);