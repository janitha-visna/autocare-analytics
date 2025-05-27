import { useForm, usePage } from "@inertiajs/react";

export default function Create() {
    const { data, setData, post, processing, errors, reset } = useForm({
        phone: "",
        vehicle_number: "",
        vehicle_type: "",
        category_service: "", // Fixed field name to match backend
        date: "",
        start_time: "",
        end_time: "",
        amount: "",
    });

    const { flash } = usePage().props;

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/service-entry", {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => reset(),
        });
    };

    return (
        <div className="max-w-md mx-auto p-6 bg-white shadow rounded">
            <h2 className="text-xl font-semibold mb-4">Add Service Entry</h2>

            {/* Success Message */}
            {flash.success && (
                <div className="bg-green-100 p-4 rounded mb-4">
                    <div className="text-green-700 font-semibold">
                        {flash.success}
                    </div>
                    {flash.entryData && (
                        <div className="mt-2 text-sm text-green-600">
                            <p>Entry ID: {flash.entryData.entry_id}</p>
                            <p>
                                Vehicle ID:{" "}
                                {flash.entryData.vehicle_info?.vehicle_id}
                            </p>
                        </div>
                    )}
                </div>
            )}

            {/* Error Message */}
            {flash.error && (
                <div className="bg-red-100 p-4 rounded mb-4">
                    <div className="text-red-700 font-semibold">
                        {flash.error}
                    </div>
                </div>
            )}

            <form onSubmit={handleSubmit}>
                {[
                    ["Phone Number", "phone"],
                    ["Vehicle Number", "vehicle_number"],
                    ["Vehicle Type", "vehicle_type"],
                    ["Service Type Category", "category_service", "text"], // Corrected field name
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
                            className="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
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
                    className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed w-full"
                >
                    {processing ? "Submitting..." : "Create Entry"}
                </button>
            </form>
        </div>
    );
}
