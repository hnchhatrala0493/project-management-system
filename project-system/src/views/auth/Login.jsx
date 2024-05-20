import {Link} from "react-router-dom";
import "./layouts.jsx";

export default function Login(){
    return (
        <body data-kt-name="metronic" id="kt_body" className="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
            <div className="d-flex flex-column flex-root" id="kt_app_root">

        <div className="d-flex flex-column flex-lg-row flex-column-fluid">
            <div className="d-flex flex-lg-row-fluid">
                <div className="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img className="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency.png" alt="" />
                    <img className="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency-dark.png" alt="" />
                    
                    <h1 className="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
                    
                    <div className="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
                        <a href="#" className="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve interviewed
                        <br />and provides some background information about
                        <a href="#" className="opacity-75-hover text-primary me-1">the interviewee</a>and their
                        <br />work following this is a transcript of the interview.</div>
                </div>
            </div>
           
            <div className="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div className="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                    <div className="w-md-400px">
                        <form className="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
                            <div className="text-center mb-11">
                                <h1 className="text-dark fw-bolder mb-3">Sign In</h1> 
                            </div>
                           
                            <div className="fv-row mb-8">
                                <input type="text" placeholder="Email" name="email" autocomplete="off" className="form-control bg-transparent" />
                            </div>
                            
                            <div className="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" autocomplete="off" className="form-control bg-transparent" />
                            </div>
                            
                            <div className="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="../../demo1/dist/authentication/layouts/overlay/reset-password.html" className="link-primary">Forgot Password ?</a>
                            </div>
                           
                            <div className="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" className="btn btn-primary">
										<span className="indicator-label">Sign In</span>
										
										<span className="indicator-progress">Please wait...
										<span className="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
                            </div>
                            
                            <div className="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                                <a href="../../demo1/dist/authentication/layouts/overlay/sign-up.html" className="link-primary">Sign up</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    )
}