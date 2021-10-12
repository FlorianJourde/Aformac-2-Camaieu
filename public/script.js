function copy(text, target) {
  setTimeout(function () {
    $("#copied_tip").remove();
  }, 10000);
  $(target)
    .parent(".single-color")
    .append("<div class='tip' id='copied_tip'>Copié !</div>");
  var input = document.createElement("input");
  input.setAttribute("value", text);
  document.body.appendChild(input);
  input.select();
  var result = document.execCommand("copy");
  document.body.removeChild(input);
  return result;
}

const zoomDefault = mediumZoom('#zoom-default')
const zoomMargin = mediumZoom('#zoom-margin', { margin: 48 })
const zoomBackground = mediumZoom('#zoom-background', { background: '#212530', margin: 48 })
const zoomScrollOffset = mediumZoom('#zoom-scrollOffset', {
  scrollOffset: 0,
  background: 'rgba(25, 18, 25, .9)',
})

const zoomToTrigger = mediumZoom('#zoom-trigger')
const button = document.querySelector('#button-trigger')
button.addEventListener('click', () => zoomToTrigger.open())

const zoomToDetach = mediumZoom('#zoom-detach')
zoomToDetach.on('closed', () => zoomToDetach.detach())
