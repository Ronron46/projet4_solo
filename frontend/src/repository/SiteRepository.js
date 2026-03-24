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
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function getSite(id, login) {
  const url = "http://127.0.0.1:8000/api/site/" + id;
  try {
    const reponse = await fetch(url, {
        method: "GET",
        headers: {
          Authorization: "bearer " + login.value
        }
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
    return resultat
  } catch (erreur) {
    console.error(erreur.message);
  }
}


export async function editSite(site, login) {
  const url = "http://127.0.0.1:8000/api/site/" + site.id;
  try {
    const reponse = await fetch(url, {
        method: "PUT",
        body: JSON.stringify(site),
        headers: {
          Authorization: "bearer " + login.value
        }
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function createSite(site, login) {
  const url = "http://127.0.0.1:8000/api/site";
  try {
    const reponse = await fetch(url, {
        method: "POST",
        body: JSON.stringify(site),
        headers: {
          Authorization: "bearer " + login.value
        }
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function deleteSite(id, login){
  const url = "http://127.0.0.1:8000/api/site/" + id;
  try {
    const reponse = await fetch(url, {
        method: "DELETE",
        headers: {
          Authorization: "bearer " + login.value
        }
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
  } catch (erreur) {
    console.error(erreur.message);
  }
}