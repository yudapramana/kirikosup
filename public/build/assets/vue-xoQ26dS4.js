import{S as d,T as a,U as u,V as E,W as T,X as g,Y as f}from"./@vue-Dapi5KFD.js";/**
* vue v3.4.15
* (c) 2018-present Yuxi (Evan) You and Vue contributors
* @license MIT
**/const l=new WeakMap;function h(e){let n=l.get(e??f);return n||(n=Object.create(null),l.set(e??f,n)),n}function C(e,n){if(!a(e))if(e.nodeType)e=e.innerHTML;else return u;const o=e,t=h(n),s=t[o];if(s)return s;if(e[0]==="#"){const c=document.querySelector(e);e=c?c.innerHTML:""}const r=E({hoistStatic:!0,onError:void 0,onWarn:u},n);!r.isCustomElement&&typeof customElements<"u"&&(r.isCustomElement=c=>!!customElements.get(c));const{code:m}=T(e,r),i=new Function("Vue",m)(g);return i._rc=!0,t[o]=i}d(C);
