import Link from "next/link";

const footerLinks = [
  { href: "/services", label: "Services" },
  { href: "/projects", label: "Projects" },
  { href: "/about", label: "About" },
  { href: "/privacy-policy", label: "Privacy Policy" },
  { href: "/terms", label: "Terms" },
];

export function Footer() {
  return (
    <footer className="border-t border-white/10 bg-[#03060a]">
      <div className="mx-auto flex max-w-7xl flex-col gap-8 px-6 py-12 sm:px-8 lg:flex-row lg:items-end lg:justify-between lg:px-10">
        <div className="max-w-xl space-y-3">
          <p className="eyebrow">Aurelia Studio</p>
          <h2 className="text-2xl font-semibold tracking-[-0.03em] text-white">
            Luxury digital experiences built with cinematic detail.
          </h2>
        </div>
        <div className="flex flex-wrap gap-4 text-sm text-zinc-400">
          {footerLinks.map((link) => (
            <Link key={link.href} href={link.href} className="transition hover:text-white">
              {link.label}
            </Link>
          ))}
        </div>
      </div>
    </footer>
  );
}
