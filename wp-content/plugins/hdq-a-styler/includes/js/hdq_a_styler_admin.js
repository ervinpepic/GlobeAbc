jQuery(window).load(function () {
	console.log("HD Quiz Quiz Styler INIT");
	HDQ_A_STYLER();
});

function HDQ_A_STYLER() {
	if (hdq_default_styles[0] === "no styles") {
		set_default_styles();
		return;
	}

	HDQ.setImageListeners();
	checkImageChange();
	setTabEventListeners();
	document.getElementById("hdq_styler_wrapper").style.display = "block";

	function checkImageChange() {
		const bg_image = document.getElementById("question_background_image");
		let mute_observer = new MutationObserver(function (mutations) {
			mutations.forEach(function (mutation) {
				if (mutation.type == "attributes") {
					if (mutation.target.getAttribute("data-value") != "") {
						let v = bg_image.firstChild.getAttribute("src");
						console.log(v);
						document
							.getElementsByClassName("hdq_quiz")[0]
							.style.setProperty("--hdq-question-background-image", 'url("' + v + '")');
					} else {
						document.getElementsByClassName("hdq_quiz")[0].style.setProperty("--hdq-question-background-image", "initial");
					}
				}
			});
		});
		mute_observer.observe(bg_image, {
			attributes: true, //configure it to listen to attribute changes
		});
	}

	const hdq_colours = document.getElementsByClassName("hdq_color_input");
	for (let i = 0; i < hdq_colours.length; i++) {
		hdq_colours[i].addEventListener("change", function () {
			let f = this.getAttribute("data-id");
			let el = document.getElementById(f);
			el.value = this.value;
			// fire off change event
			ev = document.createEvent("Event");
			ev.initEvent("change", true, false);
			el.dispatchEvent(ev);
		});
	}

	const hdq_layout = document.getElementsByClassName("hdq_a_styler_layout_item");
	for (let i = 0; i < hdq_layout.length; i++) {
		hdq_layout[i].addEventListener("click", function () {
			let o = document.getElementsByClassName("active_layout")[0];
			let v = o.getAttribute("data-value");
			document.getElementById("hdq_a_styler_preview").classList.remove(v);
			o.classList.remove("active_layout");
			this.classList.add("active_layout");
			v = this.getAttribute("data-value");
			document.getElementById("hdq_a_styler_layout").setAttribute("data-value", v);
			document.getElementById("quiz_layout").value = v;
		});
	}

	const cssVars = [
		{ id: "question_background_color", postfix: "", class: "" },
		{ id: "title_heading_color", postfix: "", class: "" },
		{ id: "title_heading_size", postfix: "px", class: "" },
		{ id: "title_number_visibility", postfix: "", class: "" },
		{ id: "toggle_primary_color", postfix: "", class: "" },
		{ id: "toggle_secondary_color", postfix: "", class: "" },
		{ id: "answer_size", postfix: "px", class: "" },
		{ id: "answer_color", postfix: "", class: "" },
		{ id: "quiz_layout", postfix: "", class: "hdq_quiz" },
		{ id: "answer_image_radius", postfix: "%", class: "" },
		{ id: "featured_image_radius", postfix: "%", class: "" },
		{ id: "question_radius", postfix: "px", class: "" },
		{ id: "toggle_style", postfix: "", class: "hdq_quiz" },
		{ id: "question_padding", postfix: "px", class: "" },
		{ id: "question_margin", postfix: "px", class: "" },
		{ id: "button_background_color", postfix: "", class: "" },
		{ id: "button_color", postfix: "", class: "" },
		{ id: "button_radius", postfix: "px", class: "" },
		{ id: "quiz_width", postfix: "%", class: "" },
	]; // list of inputs that affect CSS vars

	for (let i = 0; i < cssVars.length; i++) {
		let el = document.getElementById(cssVars[i].id);
		el.addEventListener("change", async function () {
			// convert to cssVar name
			let cv = cssVars[i].id;
			cv = cv.split("_").join("-");
			let el = this;
			setTimeout(async function () {
				let v = el.value;

				if (cssVars[i].class == "") {
					document.getElementsByClassName("hdq_quiz")[0].style.setProperty("--hdq-" + cv, v + cssVars[i].postfix);
					if (cssVars[i].id == "toggle_secondary_color") {
						let a = await hexToRgbA(v);
						document.getElementsByClassName("hdq_quiz")[0].style.setProperty("--hdq-toggle-secondary-color2", a);
					}
				} else {
					let c = cssVars[i].class;
					c = document.getElementsByClassName(c)[0];
					let prev = c.getAttribute("data-prev");
					let j = {};
					if (prev != "" && prev != null) {
						prev = JSON.parse(prev);
						if (typeof prev[cssVars[i].id] != "undefined") {
							c.classList.remove(prev[cssVars[i].id]);
						}
					} else {
						prev = {};
					}
					prev[cssVars[i].id] = v;
					j = JSON.stringify(prev);
					c.classList.add(v);
					c.setAttribute("data-prev", j);
				}
			}, 100);
		});
	}

	// now for non standard inputs (radios, layout)
	const cssVarsHD = [
		{ id: "variation_field_title_number_visibilityinline", type: "change" },
		{ id: "variation_field_title_number_visibilitynone", type: "change" },
		{ id: "hdq_a_styler_layout_1", type: "click" },
		{ id: "hdq_a_styler_layout_2", type: "click" },
		{ id: "hdq_a_styler_layout_3", type: "click" },
		{ id: "hdq_a_styler_layout_4", type: "click" },
		{ id: "hdq_a_styler_layout_5", type: "click" },
		{ id: "variation_field_toggle_stylehdq_toggle_a", type: "click" },
		{ id: "variation_field_toggle_stylehdq_toggle_b", type: "click" },
		{ id: "variation_field_toggle_stylehdq_toggle_c", type: "click" },
		{ id: "variation_field_toggle_stylehdq_toggle_d", type: "click" },
		{ id: "variation_field_toggle_stylehdq_toggle_e", type: "click" },
		{ id: "variation_field_toggle_stylehdq_toggle_f", type: "click" },
		{ id: "variation_field_toggle_stylehdq_toggle_g", type: "click" },
	];

	for (let i = 0; i < cssVarsHD.length; i++) {
		let el = document.getElementById(cssVarsHD[i].id);
		el.addEventListener(cssVarsHD[i].type, async function () {
			let el = this.getAttribute("data-id");
			el = document.getElementById(el);
			ev = document.createEvent("Event");
			ev.initEvent("change", true, false);
			el.dispatchEvent(ev);
		});
	}

	// now for elements that do something with classes
	const cssClasses = [
		{ id: "hdq_a_styler_layout", el: "hdq_quiz" },
		{ id: "hdq_a_styler_layout", el: "hdq_quiz" },
	];

	// give toggles unique toggle class
	document.getElementById("variation_field_toggle_stylehdq_toggle_b").parentElement.parentElement.classList.add("hdq_toggle_b");
	document.getElementById("variation_field_toggle_stylehdq_toggle_c").parentElement.parentElement.classList.add("hdq_toggle_c");
	document.getElementById("variation_field_toggle_stylehdq_toggle_d").parentElement.parentElement.classList.add("hdq_toggle_d");
	document.getElementById("variation_field_toggle_stylehdq_toggle_e").parentElement.parentElement.classList.add("hdq_toggle_e");
	document.getElementById("variation_field_toggle_stylehdq_toggle_f").parentElement.parentElement.classList.add("hdq_toggle_f");
	document.getElementById("variation_field_toggle_stylehdq_toggle_g").parentElement.parentElement.classList.add("hdq_toggle_g");

	// allow saving of colour input
	HDQ.getValueByType["color"] = async function (input, options) {
		return input.value;
	};
	// allow saving of layout
	HDQ.getValueByType["hdq_a_styler_layout"] = async function (input, options) {
		return input.getAttribute("data-value");
	};

	// saving
	document.getElementById("hdq_styler_save").addEventListener("click", async function () {
		HDQ.EL.page.header.actions.save = this;
		let payload = await HDQ.validate.validateSettings();
		if (payload) {
			save(payload);
		}
	});

	function save(payload) {
		HDQ.EL.page.header.actions.save.classList.add("saving");
		HDQ.EL.page.header.actions.save.innerHTML = "saving...";
		console.log(payload);
		jQuery.ajax({
			type: "POST",
			data: {
				action: "hdq_addon_styler_save",
				payload: payload,
				nonce: document.getElementById("hdq_addon_styler_nonce").value,
			},
			url: ajaxurl,
			success: function (data) {
				console.log(data);
			},
			complete: function () {
				HDQ.EL.page.header.actions.save.classList.remove("saving");
				HDQ.EL.page.header.actions.save.innerHTML = "SAVE";
			},
		});
	}

	function set_default_styles() {
		let el = document.getElementById("hdq_styler_wrapper");
		let data = `<div id = "hdq_l_wrapper" style = "margin: 0 auto; padding: 2em; border:1px solid #bbb; max-width: 500px">
			<div class = "hdq_item">
				<label class = "hdq_input_label" for = "hdq_l">Please enter your license code</label>
				<input class = "hdq_input" id = "hdq_l" value = "" type = "text" placeholder="xxxxxxxxxxxxxxx"/>
				<p style = "text-align: right"><button class = "hdq_button" id = "hdq_l_s">SUBMIT</button></p>
			</div>
		</div>`;
		el.insertAdjacentHTML("beforebegin", data);
		el.remove();
		document.getElementById("hdq_l_s").addEventListener("click", function () {
			let l = document.getElementById("hdq_l").value;
			if (l.length > 5) {
				document.getElementById("hdq_l_s").innerHTML = "checking license...";
				jQuery.ajax({
					type: "POST",
					data: {
						action: "hdq_addon_styler_save_default_styles",
						payload: l,
					},
					url: ajaxurl,
					success: function (data) {
						console.log(data);
						data = JSON.parse(data);
						if (data.success) {
							window.location.reload(false);
						}
					},
					complete: function () {
						document.getElementById("hdq_l_s").innerHTML = "SAVE";
					},
				});
			}
		});
	}
}

async function hexToRgbA(hex) {
	// not perfect, but works in most situations
	var c;
	if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
		c = hex.substring(1).split("");
		if (c.length == 3) {
			c = [c[0], c[0], c[1], c[1], c[2], c[2]];
		}
		c = "0x" + c.join("");
		let r = (c >> 16) & 255;
		let g = (c >> 8) & 255;
		let b = c & 255;

		let x = 55;
		if (r + x > 255) {
			r = 255;
		} else {
			r = r + x;
		}
		if (g + x > 255) {
			g = 255;
		} else {
			g = g + x;
		}
		if (b + x > 255) {
			b = 255;
		} else {
			b = b + x;
		}
		return "rgb(" + [r, g, b].join(",") + ")";
	}
	throw new Error("Bad Hex");
}

function setTabEventListeners() {
	for (let i = 0; i < HDQ.EL.tabs.nav.length; i++) {
		HDQ.EL.tabs.nav[i].addEventListener("click", loadTabContent);
	}

	function loadTabContent() {
		HDQ.EL.tabs.active.nav[0].classList.remove("tab_nav_item_active");
		this.classList.add("tab_nav_item_active");

		let content = "tab_" + this.getAttribute("data-id");
		HDQ.EL.tabs.active.content[0].classList.remove("tab_content_active");
		document.getElementById(content).classList.add("tab_content_active");
	}
}
