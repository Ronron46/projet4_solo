export async function loginCheck(mail, password) {
  const url = "http://127.0.0.1:8000/api/login_check";
  let result = []
  try {
    const reponse = await fetch(url, {
        method: "POST",
        body: JSON.stringify({
            "username": mail,
            "password": password
        }),
        headers: {
            "Content-Type": "application/json" 
        }
    });
    if (!reponse.ok) {
        return result = {"status": reponse.status};
    }

    const resultat = await reponse.json();
    return result = {"status": reponse.status, "data": resultat}
  } catch (erreur) {
    console.error(erreur.message);
  }
}