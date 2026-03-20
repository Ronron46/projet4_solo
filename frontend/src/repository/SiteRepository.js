export async function getSites() {
  const url = "http://127.0.0.1:8000/api/getSites";
  try {
    const reponse = await fetch(url, {
        method: "GET"
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
    return resultat
    // console.log(resultat);
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function getSite(id) {
  const url = "http://127.0.0.1:8000/api/site/" + id;
  try {
    const reponse = await fetch(url, {
        method: "GET"
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
    return resultat
    // console.log(resultat);
  } catch (erreur) {
    console.error(erreur.message);
  }
}


export async function editSite(site) {
  const url = "http://127.0.0.1:8000/api/site/" + site.id;
  try {
    const reponse = await fetch(url, {
        method: "PUT",
        body: JSON.stringify(site)
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
    // console.log(resultat);
  } catch (erreur) {
    console.error(erreur.message);
  }
}