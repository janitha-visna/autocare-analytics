import { useForm } from "@inertiajs/react";

export default function Create() {
    const { data, setData, post, processing, errors, reset } = useForm({
        phone: "",
        vehicle_number: "",
        vehicle_type: "",
        service_type_category: "",
        date: "",
        start_time: "",
        end_time: "",
        amount: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/service-entry", {
            onSuccess: () => reset(),
        });
    };

    return (
        <div className="max-w-md mx-auto p-6 bg-white shadow rounded">
            <h2 className="text-xl font-semibold mb-4">Add Service Entry</h2>
            <form onSubmit={handleSubmit}>
                {[
                    ["Phone Number", "phone"],
                    ["Vehicle Number", "vehicle_number"],
                    ["Vehicle Type", "vehicle_type"],
                    ["Service Type Category", "service_type_category"],
                    ["Date", "date", "date"],
                    ["Start Time", "start_time", "time"],
                    ["End Time", "end_time", "time"],
                    ["Amount", "amount", "number"],
                ].map(([label, name, type = "text"]) => (
                    <div key={name} className="mb-4">
                        <label
                            className="block text-gray-700 mb-1"
                            htmlFor={name}
                        >
                            {label}
                        </label>
                        <input
                            type={type}
                            name={name}
                            id={name}
                            value={data[name]}
                            onChange={(e) => setData(name, e.target.value)}
                            className="w-full border px-3 py-2 rounded"
                        />
                        {errors[name] && (
                            <div className="text-red-500 text-sm mt-1">
                                {errors[name]}
                            </div>
                        )}
                    </div>
                ))}

                <button
                    type="submit"
                    disabled={processing}
                    className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                >
                    Submit
                </button>
            </form>
        </div>
    );
}
