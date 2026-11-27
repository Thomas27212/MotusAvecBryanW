const son = document.getElementById('testSound');

document.querySelectorAll('.button').forEach(btn => {
  btn.addEventListener('click', () => {
    son.currentTime = 0;
    son.play().catch(e => console.warn('Son bloqué :', e));
  });
});

