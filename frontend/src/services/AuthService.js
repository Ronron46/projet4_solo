import { loginCheck } from "../repository/AdminRepository"

export  class AuthService {
    static async login(user) {
        let response = await loginCheck(user.userName, user.passwd)
        if (response.status == 401) {
            return "error"
        } else if (response.status == 200) {
            localStorage.setItem("user", response.data.token)
        }
        // if (user.userName == "test" && user.passwd == "test") {
        //     localStorage.setItem("user", "honk honk")
        //     return "honk honk"
        // } else {
        //     return "error"
        // }
    }

    static logout() {
        localStorage.removeItem("user")
    }
}