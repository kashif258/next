import Link from "next/link";
import { ArrowRight, Menu } from "lucide-react";
import { Button } from "@/components/ui/button";

const links = [
  { href: "/", label: "Home" },
  { href: "/services", label: "Services" },
  { href: "/projects", label: "Projects" },
  { href: "/about", label: "About" },
  { href: "/contact", label: "Contact" },
];

export function Navbar() {
  return (
    <header className="sticky top-0 z-50 border-b border-white/10 bg-[#04070b]/80 backdrop-blur-xl">
      <div className="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 sm:px-8 lg:px-10">
        <Link href="/" className="text-sm font-semibold uppercase tracking-[0.35em] text-zinc-100">
          Aurelia
        </Link>
        <nav className="hidden items-center gap-6 text-sm text-zinc-400 md:flex">
          {links.map((link) => (
            <Link key={link.href} href={link.href} className="transition hover:text-white">
              {link.label}
            </Link>
          ))}
        </nav>
        <div className="flex items-center gap-3">
          <Button variant="primary" size="sm" className="hidden sm:inline-flex">
            Book a call
          </Button>
          <Button variant="ghost" size="sm" className="md:hidden">
            <Menu size={16} />
          </Button>
        </div>
      </div>
    </header>
  );
}
