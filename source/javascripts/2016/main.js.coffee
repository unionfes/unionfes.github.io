$(document).ready ->
  anchors = [
    "title"
    "landing"
    "band1"
    "band2"
    "band3"
    "band4"
    "band5"
    "band6"
    "band7"
    "band8"
    "band9"
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
