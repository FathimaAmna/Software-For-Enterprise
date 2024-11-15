import {
  setCustomProperty,
  incrementCustomProperty,
  getCustomProperty,
} from "./updateCustomProperty.js"

const SPEED = 0.05
const TOMATO_INTERVAL_MIN = 500
const TOMATO_INTERVAL_MAX = 2000
const worldElem = document.querySelector("[data-world]")

let nextTomatoTime
export function setupTomato() {
  nextTomatoTime = TOMATO_INTERVAL_MIN
  document.querySelectorAll("[data-tomato]").forEach(tomato => {
    tomato.remove()
  })
}

export function updateTomato(delta, speedScale) {
  document.querySelectorAll("[data-tomato]").forEach(tomato => {
    incrementCustomProperty(tomato, "--left", delta * speedScale * SPEED * -1)
    if (getCustomProperty(tomato, "--left") <= -100) {
      tomato.remove()
    }
  })

  if (nextTomatoTime <= 0) {
    createTomato()
    nextTomatoTime =
      randomNumberBetween(TOMATO_INTERVAL_MIN, TOMATO_INTERVAL_MAX) / speedScale
  }
  nextTomatoTime -= delta
}

export function getTomatoRects() {
  return [...document.querySelectorAll("[data-tomato]")].map(tomato => {
    return tomato.getBoundingClientRect()
  })
}

function createTomato() {
  const tomato = document.createElement("img")
  tomato.dataset.tomato = true
  tomato.src = "./assets/imgs/tomato.png"
  tomato.classList.add("tomato")
  setCustomProperty(tomato, "--left", 100)
  worldElem.append(tomato)
}

function randomNumberBetween(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min)
}
