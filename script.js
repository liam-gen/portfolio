const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 10,
})

sr.reveal('.main_header')
sr.reveal('.skills', {delay: 100})

const projects = {
    "levendelaiscinema.fr": {
        "title": "Cinéma Le Vendelais",
        "description": "Redesign, développement et maintenance du site web qui affiche les films de l'association le Vendelais",
        "website": "https://levendelaiscinema.fr",
        "image": "./assets/images/projects/levendelaiscinema.fr.png",
        "technologies": ["PHP", "API", "Dashboard", "Newsletter", "SEO", "Google Analytics", "NextCloud", "OVHCloud"]
    },
    "yvandespizz.fr": {
        "title": "Cinéma Le Vendelais",
        "description": "Redesign, développement et maintenance du site web d'un restaurateur à Châtillon-en-Vendelais",
        "website": "https://yvandespizz.fr",
        "image": "./assets/images/projects/yvandespizz.fr.png",
        "technologies": ["PHP", "API", "Dashboard", "SEO", "Google Analytics", "OVHCloud"]
    }
}

Object.values(document.querySelectorAll(".open-project")).forEach(element => {
    element.addEventListener("click", () => {
        let project = projects[element.getAttribute("project-id")]
        var modal = new tingle.modal({
            footer: false,
            closeMethods: ['overlay', 'button', 'escape'],
            closeLabel: "Fermer",
        });
        modal.setContent(`<div style="color:var(--background-color)"><img style="width:100%;border-radius:8px;" src="${project["image"]}"></img><br><h1>${project["title"]}</h1><br>${project["description"]}</div><br><h3>Technologies utilisées</h3><div style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">${project["technologies"].map(e => "<span style='background: var(--accent-color);padding:5px;border-radius:8px;'>"+e+"</span>").join("&nbsp;")}</div><br><a href="${project["website"]}?utm_src=liamcharpentier.fr" target="_blank" class="cta"><span>Ouvrir le site web</span><svg width="15px" height="10px" viewBox="0 0 13 10"><path d="M1,5 L11,5"></path><polyline points="8 1 12 5 8 9"></polyline></svg></a>`)
        modal.open()
    })
})

let services = {
    "create-website": {
        "object": "Devis - Création de site web",
        "message": "Bonjour,\nJe souhaiterais obtenir un devis pour la création d'un site web. Voici mes besoins :\n- Un design moderne et responsive\n- Intégration d'un blog\n- Référencement SEO\nIl s'agit d'un site pour...\n\nMerci de bien vouloir me faire une proposition de prix et de délai."
    },
    "edit-website": {
        "object": "Devis - Refonte de site web",
        "message": "Bonjour,\nJe souhaiterais obtenir un devis pour la refonte d'un site web. Voici mes besoins :\n- Modernisation du design et de l'interface utilisateur\n- Amélioration de l'expérience utilisateur (UX)\n- Réduction du temps de chargement des pages\n- Optimisation du site pour le SEO\n- Mise à jour des technologies utilisées (ex: CMS, responsive design, etc.)\n- Accompagnement pour la mise en ligne du nouveau site\n- Voici le lien vers le site actuel : https://......\n\nMerci de bien vouloir me faire une proposition de prix et de délai."
    },
    "desktop-app": {
        "object": "Devis - Création application PC",
        "message": "Bonjour,\n\nJe souhaiterais obtenir un devis pour la création d'une application PC sur mesure. Voici mes besoins :\n- Application compatible Windows et éventuellement Linux\n- Interface utilisateur simple et intuitive\n- Option de mise à jour automatique\n- Accompagnement pour la mise en production\n- L'application servirait à ...\n\nMerci de bien vouloir me faire une proposition de prix et de délai pour ce projet."
    },
    "mobile-app": {
        "object": "Devis - Création application mobile",
        "message": "Bonjour,\n\nJe souhaiterais obtenir un devis pour la création d'une application mobile sur mesure. Voici mes besoins :\n- Application compatible Android\n- Interface utilisateur simple et intuitive\n- Accompagnement pour la mise en production\n- L'application servirait à ...\n\nMerci de bien vouloir me faire une proposition de prix et de délai pour ce projet."
    },
    "browser-ext": {
        "object": "Devis - Création d'extension pour navigateur",
        "message": "Bonjour,\n\nJe souhaiterais obtenir un devis pour la création d'une extension sur mesure. Voici mes besoins :\n- Extension compatible Chrome et Firefox\n- Interface utilisateur simple et intuitive\n- Accompagnement pour la mise en production sur le Chrome Web Store\n- L'extension servirait à ...\n\nMerci de bien vouloir me faire une proposition de prix et de délai pour ce projet."
    }
}

let form = document.querySelector("form");
Object.values(document.querySelectorAll('button[data-service]')).forEach(button => {
    button.addEventListener('click', () => {
        let data = services[button.getAttribute('data-service')]

        form.querySelector('input[name="objet"]').value = data["object"]
        form.querySelector('textarea[name="message"]').value = data["message"]

        form.scrollIntoView();

        form.querySelector('input[name="name"]').focus()
        //button.getAttribute('data-service')
    })
})