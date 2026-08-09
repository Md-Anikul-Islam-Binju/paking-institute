const r1 = row1Track,
      r2 = row2Track;

let x1 = -500,
    x2 = -300,
    last = scrollY;

const move = d => {
    x1 += d * .9;
    x2 -= d * .9;

    const w1 = r1.scrollWidth / 2,
          w2 = r2.scrollWidth / 2;

    if (x1 > 0) x1 -= w1;
    if (x1 < -w1) x1 += w1;
    if (x2 > 0) x2 -= w2;
    if (x2 < -w2) x2 += w2;

    r1.style.transform = `translateX(${x1}px)`;
    r2.style.transform = `translateX(${x2}px)`;
};

addEventListener("scroll", () => {
    move(scrollY - last);
    last = scrollY;
});

move(0);