/**
 * Blog Page Component
 */

import React, { useEffect, useState } from 'react';

const Blog = () => {
    const [posts, setPosts] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function loadPosts() {
            try {
                const res = await window.axios.get('/blog-posts');
                setPosts(res.data.posts || []);
            } catch (error) {
                console.error('Error loading blog posts:', error);
            } finally {
                setLoading(false);
            }
        }
        loadPosts();
    }, []);

    if (loading) {
        return (
            <div className="container py-5">
                <div className="text-center">
                    <div className="spinner-border" role="status">
                        <span className="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        );
    }

    return (
        <div className="blog-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <h1 className="text-center mb-5">Latest Blog Posts</h1>
                    </div>
                </div>
                <div className="row">
                    {posts.map(post => (
                        <div className="col-lg-4 col-md-6 mb-4" key={post.id}>
                            <div className="card h-100">
                                <img 
                                    src={`/storage/${post.image_url}`} 
                                    className="card-img-top" 
                                    alt={post.title}
                                    style={{ height: '250px', objectFit: 'cover' }}
                                />
                                <div className="card-body d-flex flex-column">
                                    <div className="mb-2">
                                        <small className="text-muted">
                                            {new Date(post.created_at).toLocaleDateString('en-US', { 
                                                year: 'numeric', 
                                                month: 'long', 
                                                day: 'numeric' 
                                            })}
                                        </small>
                                    </div>
                                    <h5 className="card-title">{post.title}</h5>
                                    <div 
                                        className="card-text flex-grow-1"
                                        dangerouslySetInnerHTML={{ 
                                            __html: post.description ? 
                                                post.description.replace(/<[^>]*>?/gm, '').substring(0, 150) + '...' : 
                                                'No description available'
                                        }}
                                    />
                                    <div className="mt-auto pt-3">
                                        <a 
                                            href={`/blogs-detail/${post.slug}`} 
                                            className="btn btn-primary"
                                        >
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
                {posts.length === 0 && (
                    <div className="text-center py-5">
                        <h3>No blog posts available</h3>
                        <p>Check back later for the latest updates!</p>
                    </div>
                )}
            </div>
        </div>
    );
};

export default Blog;
