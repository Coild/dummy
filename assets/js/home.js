const landingClasses = document.querySelectorAll(".landing");
const navClasses = document.querySelectorAll(".nav-right ul li");
const navbar = document.querySelector(".navbar");
const landingHome = document.querySelector(".landing.home");
window.addEventListener("scroll", () => {
	let current = "";

	// console.log(scrollY); //ini untuk cek so dimana torang d scroll (atas ke bawah)
	landingClasses.forEach((landingClass) => {
		const landingTop = landingClass.offsetTop; //ini untuk menghitung jarak antar landing ->cek console.log(landingTop)
		const landingHeight = landingClass.clientHeight; // ini untuk mencari tahu berapa tinggi dari masing-masing landing
		console.log('landing top')
		if (scrollY >= landingTop - landingHeight / 3) {
			current = landingClass.getAttribute("id");
		}
	});
	navClasses.forEach((li) => {
		li.classList.remove("active");

		if (li.classList.contains(current)) {
			li.classList.add("active");
		}
	});

	const landingHomeTop = landingHome.offsetTop;
	const landingHomeHeight = landingHome.clientHeight;



	if (scrollY === landingHomeTop) {
		navbar.classList.remove('scrolled');
	}
	else if (scrollY >= landingHomeTop - landingHomeHeight / 5) {
		navbar.classList.add('scrolled');
	}
});

// id dari class landing musti sama deng class dari li.

// Ini for bking animation on scroll
const observer = new IntersectionObserver((entries) => {
	entries.forEach((entry) => {
		// console.log(entry);
		if (entry.isIntersecting) {
			entry.target.classList.add("show");
		}
		// } else {
		// 	entry.target.classList.remove("show");
		// }
	});
});

const hiddenElements = document.querySelectorAll(".hidden");

// Untuk semua elemnent dengan class hidden akan diobserve
hiddenElements.forEach((elmnt) => observer.observe(elmnt));
