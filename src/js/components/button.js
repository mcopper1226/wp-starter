import GradientPath from 'gradient-path';

export default function init() {
  const gp = new GradientPath({
    path: document.querySelector('#gradient-path path'),
    segments: 30,
    samples: 3,
    precision: 2 // Optional
  });

  gp.render({
    type: 'path',
    fill: [
      { color: 'rgba(239, 63, 107, 1)', pos: 0 },
      { color: 'rgba(239, 63, 107, .1)', pos: 1 }
    ],
    width: 10
  });

  console.info('hello from button');
}
