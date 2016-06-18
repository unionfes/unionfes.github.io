$(document).ready ->
  anchors = [
    "title"
    "band"
    "about"

  ]
  $("#container").fullpage({
    anchors: anchors,
    menu: "#menu",
    #navigation: true,
    #navigationPosition: "right"
    continuousVertical: true,
    scrollingSpeed: 700,
    #responsive: 1024,
  })
  @
