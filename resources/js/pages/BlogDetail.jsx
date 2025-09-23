/**
 * Blog Detail Page Component
 */

import React, { useEffect, useState } from 'react';

// Use React Router DOM from CDN
const { useParams } = window.ReactRouterDOM;

const BlogDetail = () => {
    const { slug } = useParams();
    const [post, setPost] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function loadPost() {
            try {
                const res = await window.axios.get(`/blog-detail/${slug}`);
                setPost(res.data.post);
            } catch (error) {
                console.error('Error loading blog post:', error);
            } finally {
                setLoading(false);
            }
        }
        loadPost();
    }, [slug]);

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

    if (!post) {
        return (
            <div className="container py-5">
                <div className="text-center">
                    <h1>Blog post not found</h1>
                    <a href="/blog" className="btn btn-primary">Back to Blog</a>
                </div>
            </div>
        );
    }

    return (
        <div className="blog-detail-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-lg-8 mx-auto">
                        <article>
                            <header className="mb-4">
                                <h1 className="display-4 mb-3">{post.title}</h1>
                                <div className="text-muted mb-4">
                                    <small>
                                        Published on {new Date(post.created_at).toLocaleDateString('en-US', { 
                                            year: 'numeric', 
                                            month: 'long', 
                                            day: 'numeric' 
                                        })}
                                    </small>
                                </div>
                                {post.image_url && (
                                    <div className="mb-4">
                                        <img 
                                            src={`/storage/${post.image_url}`} 
                                            className="img-fluid rounded" 
                                            alt={post.title}
                                        />
                                    </div>
                                )}
                            </header>
                            <div 
                                className="blog-content"
                                dangerouslySetInnerHTML={{ __html: post.description }}
                            />
                        </article>
                        
                        <div className="mt-5 pt-4 border-top">
                            <div className="d-flex justify-content-between">
                                <a href="/blog" className="btn btn-outline-primary">
                                    <i className="fa fa-arrow-left me-2"></i>
                                    Back to Blog
                                </a>
                                <div className="social-share">
                                    <span className="me-2">Share:</span>
                                    <a href="#" className="btn btn-outline-primary btn-sm me-2">
                                        <i className="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" className="btn btn-outline-info btn-sm me-2">
                                        <i className="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" className="btn btn-outline-success btn-sm">
                                        <i className="fa fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default BlogDetail;
