import { updateGround, setupGround } from "./ground.js";
import { updateMan, setupMan, getManRect, setManLose } from "./man.js";
import { updateTomato, setupTomato, getTomatoRects } from "./tomato.js";

const WORLD_WIDTH = 100;
const WORLD_HEIGHT = 30;
const SPEED_SCALE_INCREASE = 0.00001;

const worldElem = document.querySelector("[data-world]");
const scoreElem = document.querySelector("[data-score]");
const startScreenElem = document.querySelector("[data-start-screen]");

setPixelToWorldScale();
window.addEventListener("resize", setPixelToWorldScale);
document.addEventListener("keydown", handleStart, { once: true });

let lastTime;
let speedScale;
let score;
function update(time) {
  if (lastTime == null) {
    lastTime = time;
    window.requestAnimationFrame(update);
    return;
  }
  const delta = time - lastTime;

  updateGround(delta, speedScale);
  updateMan(delta, speedScale);
  updateTomato(delta, speedScale);
  updateSpeedScale(delta);
  updateScore(delta);
  if (checkLose()) return handleLose();

  lastTime = time;
  window.requestAnimationFrame(update);
}

function checkLose() {
  const manRect = getManRect();
  return getTomatoRects().some((rect) => isCollision(rect, manRect));
}

function isCollision(rect1, rect2) {
  return (
    rect1.left < rect2.right &&
    rect1.top < rect2.bottom &&
    rect1.right > rect2.left &&
    rect1.bottom > rect2.top
  );
}

function updateSpeedScale(delta) {
  speedScale += delta * SPEED_SCALE_INCREASE;
}

function updateScore(delta) {
  score += delta * 0.001;
  scoreElem.textContent = Math.floor(score);
}

function handleStart() {
  lastTime = null;
  speedScale = 1;
  score = 0;
  setupGround();
  setupMan();
  setupTomato();
  startScreenElem.classList.add("hide");
  window.requestAnimationFrame(update);
}

function handleLose() {
  setManLose();

  updateHeartInUser();

  // Save the final score to the database
  saveScoreToDatabase(score);

  setTimeout(() => {
    document.addEventListener("keydown", handleStart, { once: true });
    startScreenElem.classList.remove("hide");
    location.reload();
  }, 100);
}

function setPixelToWorldScale() {
  let worldToPixelScale;
  if (window.innerWidth / window.innerHeight < WORLD_WIDTH / WORLD_HEIGHT) {
    worldToPixelScale = window.innerWidth / WORLD_WIDTH;
  } else {
    worldToPixelScale = window.innerHeight / WORLD_HEIGHT;
  }

  worldElem.style.width = `${WORLD_WIDTH * worldToPixelScale}px`;
  worldElem.style.height = `${WORLD_HEIGHT * worldToPixelScale}px`;
}

function saveScoreToDatabase(score) {
  console.log("saving score", Math.round(score));

  $.post(
    "http://localhost/tomato-API-game/save_score.php",
    {
      score: Math.round(score),
    },
    (response) => {
      // response from PHP back-end
      console.log(response);
      // redirectToMathsGamePage();
    }
  );
}

function updateHeartInUser() {
  $.post(
    "http://localhost/tomato-API-game/functions/userHeartHandler.php",
    (response) => {
      // response from PHP back-end
      console.log(response);
    }
  );
}

function redirectToMathsGamePage() {
  // Redirect to the specified page after a delay
  setTimeout(() => {
    window.location.href = "http://localhost/tomato-API-game/mathsGame.php";
  }, 1000); // Delay in milliseconds before redirection (adjust as needed)
}
