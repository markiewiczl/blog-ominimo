export default function Post({post}) {
    return (
        <div className="flex justify-center p-1">
            <div className="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                <div className="flex w-full items-center justify-between border-b pb-3">
                    <div className="flex items-center space-x-3">
                        <div className="text-lg font-bold text-slate-700">{post.user.name} - {post.user.email}</div>
                    </div>
                    <div className="flex items-center space-x-8">
                        <div className="text-xs text-neutral-500"></div>
                    </div>
                </div>

                <div className="mt-4 mb-6">
                    <div className="mb-3 text-xl font-bold">{post.title}</div>
                    <div className="text-sm text-neutral-600">{post.content}</div>
                </div>

                <div>
                    <div className="flex items-center justify-between text-slate-500">
                        <div className="flex space-x-4 md:space-x-8">
                            <div className="flex cursor-pointer items-center transition hover:text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" className="mr-1.5 h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                                <span>125</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
