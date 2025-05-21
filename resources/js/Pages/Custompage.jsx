import React from "react";
import LoginForm from "@/Pages/Auth/CustomLogin";
import Layout from "@/Layouts/CustomLayout";

const Login = () => {
    return <LoginForm />;
};

Login.layout = (page) => <Layout children={page} />;

export default Login;
