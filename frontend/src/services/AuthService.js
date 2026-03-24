export class AuthService {
    static login(user) {
        if (user.userName == "test" && user.passwd == "test") {
            localStorage.setItem("user", "honk honk")
            return "honk honk"
        } else {
            return "error"
        }
    }

    static logout() {
        localStorage.removeItem("user")
    }
}