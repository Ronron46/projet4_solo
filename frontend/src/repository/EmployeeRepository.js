export async function getEmployees() {
  const url = "http://127.0.0.1:8000/api/getEmployees";
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

export async function getEmployee(id, login) {
  const url = "http://127.0.0.1:8000/api/employee/" + id;
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

export async function editEmployee(employee, login) {
  const url = "http://127.0.0.1:8000/api/employee/" + employee.id;
  try {
    const reponse = await fetch(url, {
        method: "PUT",
        body: JSON.stringify(employee),
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

export async function createEmployee(employee, login) {
  const url = "http://127.0.0.1:8000/api/employee";
  try {
    const reponse = await fetch(url, {
        method: "POST",
        body: JSON.stringify(employee),
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

export async function deleteEmployee(id, login){
  const url = "http://127.0.0.1:8000/api/employee/" + id;
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



