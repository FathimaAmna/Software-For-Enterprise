import {
  incrementCustomProperty,
  setCustomProperty,
  getCustomProperty,
} from "./updateCustomProperty.js"

const manElem = document.querySelector("[data-man]")
const JUMP_SPEED = 0.45
const GRAVITY = 0.0015
const MAN_FRAME_COUNT = 2
const FRAME_TIME = 100

let isJumping
let manFrame
let currentFrameTime
let yVelocity
export function setupMan() {
  isJumping = false
  manFrame = 0
  currentFrameTime = 0
  yVelocity = 0
  setCustomProperty(manElem, "--bottom", 0)
  document.removeEventListener("keydown", onJump)
  document.addEventListener("keydown", onJump)
}

export function updateMan(delta, speedScale) {
  handleRun(delta, speedScale)
  handleJump(delta)
}

export function getManRect() {
  return manElem.getBoundingClientRect()
}
  
export function setManLose() {
  manElem.src = "./assets/imgs/man-lose.png"
}

function handleRun(delta, speedScale) {
  if (isJumping) {
    manElem.src = `./assets/imgs/man-stationary.png`
    return
  }

  if (currentFrameTime >= FRAME_TIME) {
    manFrame = (manFrame + 1) % MAN_FRAME_COUNT
    manElem.src = `./assets/imgs/man-run-${manFrame}.png`
    currentFrameTime -= FRAME_TIME
  }
  currentFrameTime += delta * speedScale
}

function handleJump(delta) {
  if (!isJumping) return

  incrementCustomProperty(manElem, "--bottom", yVelocity * delta)

  if (getCustomProperty(manElem, "--bottom") <= 0) {
    setCustomProperty(manElem, "--bottom", 0)
    isJumping = false
  }

  yVelocity -= GRAVITY * delta
}

function onJump(e) {
  if (e.code !== "Space" || isJumping) return

  yVelocity = JUMP_SPEED
  isJumping = true
}
