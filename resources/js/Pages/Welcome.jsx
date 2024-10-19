import { Head, Link } from '@inertiajs/react';
import MainLayout from "@/Layouts/MainLayout.jsx";

export default function Welcome() {
    return (
        <MainLayout>

            <Head title="Welcome" />

            Welcome in my Blog application!!!
        </MainLayout>
    );
}
