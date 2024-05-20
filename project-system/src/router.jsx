import {createBrowserRouter} from "react-router-dom";
import Login from "./views/auth/Login.jsx";

const router = createBrowserRouter ([
    {
        path:"/Login",
        element:<Login/>
    }
])

export default router;