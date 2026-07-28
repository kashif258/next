import { ArrowUpRight } from "lucide-react";

interface FeatureCardProps {
  title: string;
  description: string;
  index: number;
}

export function FeatureCard({ title, description, index }: FeatureCardProps) {
  return (
    <div className="glass-panel group rounded-[1.75rem] p-7 transition duration-300 hover:-translate-y-1">
      <div className="mb-8 flex items-center justify-between">
        <span className="text-sm uppercase tracking-[0.35em] text-zinc-400">0{index}</span>
        <div className="rounded-full border border-white/10 p-2 text-[#f0c777] transition group-hover:rotate-45">
          <ArrowUpRight size={16} />
        </div>
      </div>
      <h3 className="text-xl font-semibold text-white">{title}</h3>
      <p className="mt-3 text-sm leading-7 text-zinc-300">{description}</p>
    </div>
  );
}
