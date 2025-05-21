import React from "react";
import { useForm } from "@inertiajs/react";
import { Form, Button, Card, Container, Alert } from "react-bootstrap";

export default function Login() {
    const { data, setData, post, processing, errors } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();
        post("/login");
    };

    return (
        <Container
            className="d-flex justify-content-center align-items-center"
            style={{ minHeight: "100vh" }}
        >
            <Card
                style={{ width: "100%", maxWidth: "400px" }}
                className="p-4 shadow"
            >
                <h2 className="text-center mb-4">Login</h2>
                <Form onSubmit={submit}>
                    <Form.Group className="mb-3" controlId="formEmail">
                        <Form.Label>Email</Form.Label>
                        <Form.Control
                            type="email"
                            name="email"
                            value={data.email}
                            onChange={(e) => setData("email", e.target.value)}
                            isInvalid={!!errors.email}
                        />
                        {errors.email && (
                            <Form.Control.Feedback type="invalid">
                                {errors.email}
                            </Form.Control.Feedback>
                        )}
                    </Form.Group>

                    <Form.Group className="mb-3" controlId="formPassword">
                        <Form.Label>Password</Form.Label>
                        <Form.Control
                            type="password"
                            name="password"
                            value={data.password}
                            onChange={(e) =>
                                setData("password", e.target.value)
                            }
                            isInvalid={!!errors.password}
                        />
                        {errors.password && (
                            <Form.Control.Feedback type="invalid">
                                {errors.password}
                            </Form.Control.Feedback>
                        )}
                    </Form.Group>

                    <Form.Group className="mb-3" controlId="formRemember">
                        <Form.Check
                            type="checkbox"
                            label="Remember me"
                            name="remember"
                            checked={data.remember}
                            onChange={(e) =>
                                setData("remember", e.target.checked)
                            }
                        />
                    </Form.Group>

                    <Button
                        variant="primary"
                        type="submit"
                        disabled={processing}
                        className="w-100"
                    >
                        {processing ? "Logging in..." : "Login"}
                    </Button>
                </Form>
            </Card>
        </Container>
    );
}
