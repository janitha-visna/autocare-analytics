import { useForm } from "@inertiajs/react";
import React from "react";

export default function OtpVerify({ email }) {
    const { data, setData, post, processing, errors } = useForm({
        email: email || "",
        otp: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post(route("otp.verify"));
    };

    return (
        <div className="container mt-5">
            <h3>Enter OTP</h3>
            <form onSubmit={submit}>
                <input type="hidden" value={data.email} />
                <div className="mb-3">
                    <label>OTP Code</label>
                    <input
                        type="text"
                        className={`form-control ${
                            errors.otp ? "is-invalid" : ""
                        }`}
                        value={data.otp}
                        onChange={(e) => setData("otp", e.target.value)}
                    />
                    {errors.otp && (
                        <div className="invalid-feedback">{errors.otp}</div>
                    )}
                </div>

                <button
                    type="submit"
                    className="btn btn-success"
                    disabled={processing}
                >
                    Verify OTP
                </button>
            </form>
        </div>
    );
}
