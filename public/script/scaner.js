const camera = document.querySelector("#camera");

Quagga.init(
  {
    inputStream: {
      name: "Live",
      type: "LiveStream",
      target: document.querySelector("#camera"), // Or '#yourElement' (optional)
    },
    decoder: {
      readers: ["ean_reader"],
    },
    halfSample: true,
    patchSize: "x-large", // x-small, small, medium, large, x-large
    debug: {
      showCanvas: false,
      showPatches: false,
      showFoundPatches: false,
      showSkeleton: true,
      showLabels: false,
      showPatchLabels: false,
      showRemainingPatchLabels: false,
      boxFromPatches: {
        showTransformed: false,
        showTransformedBox: false,
        showBB: false,
      },
    },
  },
  function (err) {
    if (err) {
      return;
    }
    console.log("Initialization finished. Ready to start ");
    Quagga.start();
  }
);
// Quagga.onDetected = (data) => {
//   console.log(data);
// };

// ici je donne du style a mon scan
camera.firstChild.classList.add("show2");