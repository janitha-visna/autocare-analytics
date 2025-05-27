// resources/js/Pages/Home.jsx
import AppLayout from "../Layouts/AppLayout";

export default function Home() {
    return (
        <div>
            <h1>Welcome to the Home Page</h1>
            <p>
                This is your home content inside a layout with header and
                footer.
            </p>
        </div>
    );
}

// Apply persistent layout
Home.layout = (page) => <AppLayout children={page} />;
