import { uri } from "./url";

export async function getServices() {
  const url = uri + "/api/getServices";
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

export async function getService(id, login) {
  const url = uri + "/api/service/" + id;
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


export async function editService(service, login) {
  const url = uri + "/api/service/" + service.id;
  try {
    const reponse = await fetch(url, {
        method: "PUT",
        body: JSON.stringify(service),
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

export async function createService(service, login) {
  const url = uri + "/api/service";
  try {
    const reponse = await fetch(url, {
        method: "POST",
        body: JSON.stringify(service),
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

export async function deleteService(id, login){
  const url = uri + "/api/service/" + id;
  try {
    const reponse = await fetch(url, {
        method: "DELETE",
        headers: {
          Authorization: "bearer " + login.value
        }
    });
    if (!reponse.ok) {
      return 'error';
    }

    const resultat = await reponse.json();
  } catch (erreur) {
    console.error(erreur.message);
  }
}