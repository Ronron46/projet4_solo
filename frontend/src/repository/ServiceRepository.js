export async function getServices() {
  const url = "http://127.0.0.1:8000/api/getServices";
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

export async function getService(id) {
  const url = "http://127.0.0.1:8000/api/service/" + id;
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


export async function editService(service) {
  const url = "http://127.0.0.1:8000/api/service/" + service.id;
  try {
    const reponse = await fetch(url, {
        method: "PUT",
        body: JSON.stringify(service)
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function createService(service) {
  const url = "http://127.0.0.1:8000/api/service";
  try {
    const reponse = await fetch(url, {
        method: "POST",
        body: JSON.stringify(service)
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function deleteService(id){
  const url = "http://127.0.0.1:8000/api/service/" + id;
  try {
    const reponse = await fetch(url, {
        method: "DELETE"
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
  } catch (erreur) {
    console.error(erreur.message);
  }
}