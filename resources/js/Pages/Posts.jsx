import {Head, usePage} from '@inertiajs/react';
import MainLayout from "@/Layouts/MainLayout.jsx";
import Post from "@/Components/Post.jsx";

export default function Posts({posts}) {

    return (
        <MainLayout>
            <>
                <Head title="Posts" />
                {posts.map((post, index) => (
                    <Post key={index} post={post}/>
                ))}
            </>
        </MainLayout>
    );
}
